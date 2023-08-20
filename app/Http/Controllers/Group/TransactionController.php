<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Post;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    // index
    public function index(Group $group)
    {
        // get all transactions
        // return view group transaction index
        // get all transactions from group
        $transactions = $group->transactions()->get();
        // get post from transaction

        return view('group.transaction.index', compact('group', 'transactions'));
    }
    // search
    public function search(Group $group, Request $request)
    {

        // search query
        $search = $request->search;
        // if no request return
        if (!$search) {
            return redirect()->route('group.transactions', $group);
        }
        //  search transaction users
        $transactions = $group->transactions()->whereHas('users', function ($query) use ($search) {
            $query->where('name', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->orWhere('username', 'LIKE', "%{$search}%");
        })->get();
        // now get all users filter by status pivot group_user
        $searchQuery = $search;
        return view('group.transaction.index', compact('group', 'transactions', 'searchQuery'));
    }
    // create
    public function create(Group $group)
    {
        // get all users from group where status is accepted except auth user
        $users = $group->users()->wherePivot('status', 'accepted')->where('id', '!=', auth()->user()->id)->get();

        // return view group transaction create
        return view('group.transaction.create', compact('group', 'users'));
    }
    // store
    public function store(Request $request, Group $group){
        $request->validate([
            'reciever' => 'required|exists:users,email',
            'amount' => 'required|numeric',
            'description' => 'required|string',
        ]);
        $request['group_id'] = $group->id;

        $transaction = Transaction::create([
            'group_id' => $request->group_id,
            'amount' => $request->amount,
            'description' => $request->description,
        ]);

        // get owner and reciever
        $reciever = User::where('email', $request->reciever)->first();
        $owner = User::where('id', auth()->user()->id)->first();
        // save owner and reciever in pivot
        $transaction->users()->attach($reciever->id, ['owner' => 0]);
        $transaction->users()->attach($owner->id, ['owner' => 1]);

        // set amount
        $ownerBalance = $owner->groups->where('id', $group->id)->first()->pivot->points -= $request->amount;
        $recieverBalance = $reciever->groups->where('id', $group->id)->first()->pivot->points += $request->amount;

        $owner->groups()->updateExistingPivot($group->id, ['points' => $ownerBalance]);
        $reciever->groups()->updateExistingPivot($group->id, ['points' => $recieverBalance]);

        // redirect
        return redirect()->route('group.transactions', compact('group', 'transaction'));

    }
}
