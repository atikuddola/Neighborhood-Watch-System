<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feed</title>
    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <!-- Navigation Bar -->
    <!-- Navigation Bar -->
<nav class="navbar">
    <div class="nav-links">
        <div class="brand-logo">Neighborhood</div>
            <div class="links">
                <a href="#"><i class="fas fa-home"></i></a>
                <a href="#"><i class="fas fa-envelope"></i></a>
                <div class="dropdown">
                    <a href="#"><i class="fas fa-user"></i></a>
                    <div class="dropdown-content">
                        <a href="#">My Profile</a>
                        <!-- Logout Form -->
                        <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>


    <!-- Main Content -->
    <div class="container">
        <!-- Status Post Form -->
        <div class="post-form">
            <h5>Post a Status</h5>
            <form id="status-form" method = "POST" action='/post_req'>
                @csrf
                <textarea id="status-text" name = "status" placeholder="What's on your mind?"></textarea>
                <div class="file-upload">
                    <label for="status-photo">
                        <input type="file" id="status-photo">
                        <span>Upload a photo</span>
                    </label>
                </div>
                <button class="btn" type="submit">Post</button>
            </form>


        </div>

        <!-- User Posts -->
        <div class="row">
            <!-- Example Post Card -->
            <div class="card">
                <img src="https://via.placeholder.com/800x400" alt="Post Image">
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
    <!-- Font Awesome for Icons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>
