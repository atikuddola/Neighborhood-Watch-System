<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feed</title>
    <!-- Material Design for Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="style.css" rel="stylesheet">
    <style>
        .map-container {
            margin-top: 20px;
            position: relative;
            height: 300px;
        }
        #map {
            height: 100%;
            width: 100%;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="nav-wrapper">
            <a href="#" class="brand-logo">Neighborhood</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="#"><i class="fas fa-home"></i></a></li>
                <li><a href="#"><i class="fas fa-envelope"></i></a></li>
                <li>
                    <div class="dropdown">
                        <a href="#" class="dropdown-trigger" data-target="dropdown1"><i class="fas fa-user"></i></a>
                        <ul id="dropdown1" class="dropdown-content">
                            <li><a href="#">My Profile</a></li>
                            <li>
                                <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                                    @csrf
                                    <button type="submit">Logout</button>
                                </form>
                                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <!-- Status Post Form -->
        <div class="post-form">
            <h5>Post a Status</h5>
            <form id="status-form" method="POST" action='/post_req'>
                @csrf
                <div class="input-field">
                    <textarea id="status-text" name="status" class="materialize-textarea" placeholder="What's on your mind?"></textarea>
                </div>
                <div class="file-upload">
                    <label for="status-photo">
                        <input type="file" id="status-photo">
                        <span>Upload a photo</span>
                    </label>
                </div>
                <button class="btn" type="submit">Post</button>
            </form>
        </div>

        <!-- Emergency Search -->
        <div class="emergency-section">
            <h5>Any Emergency?</h5>
            <div class="input-field">
                <input id="location-search" type="text" class="validate">
                <label for="location-search">Search for a place</label>
            </div>
            <div class="map-container">
                <div id="map"></div>
            </div>
        </div>

        <!-- User Posts -->
        <div class="row">
            <!-- Example Post Card -->
            <div class="card">
                <div class="card-image">
                    <img src="https://via.placeholder.com/800x400" alt="Post Image">
                </div>
                <div class="card-content">
                    <p>This is an example status post. You can add more content here.</p>
                </div>
                <div class="card-action">
                    <a href="#">Like</a>
                    <a href="#">Comment</a>
                </div>
            </div>

            <!-- Add more post cards here -->
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- Materialize JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <!-- Google Maps API -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places"></script>
    <script>
        function initMap() {
            const map = new google.maps.Map(document.getElementById('map'), {
                center: { lat: -34.397, lng: 150.644 },
                zoom: 8,
            });
            
            const input = document.getElementById('location-search');
            const autocomplete = new google.maps.places.Autocomplete(input);
            
            autocomplete.addListener('place_changed', function() {
                const place = autocomplete.getPlace();
                if (!place.geometry) {
                    console.log("No details available for input: '" + place.name + "'");
                    return;
                }

                // Move map to the place location
                if (place.geometry.viewport) {
                    map.fitBounds(place.geometry.viewport);
                } else {
                    map.setCenter(place.geometry.location);
                    map.setZoom(17);  // Zoom to a high level to view the place details
                }

                // Store coordinates
                const coordinates = {
                    lat: place.geometry.location.lat(),
                    lng: place.geometry.location.lng()
                };
                console.log('Selected Coordinates:', coordinates);
            });
        }

        // Load the map
        window.initMap = initMap;
    </script>
</body>
</html>
