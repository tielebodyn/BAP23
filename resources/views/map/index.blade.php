<x-app-layout>

 <title>Display a map on a webpage</title>
<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
<link href="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.css" rel="stylesheet">
<script src="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.js"></script>
<style>

</style>
</head>
<body>
<div id="map" class="!absolute top-0 bottom-0 w-full"></div>
@vite('resources/js/map.js')
</x-app-layout>
