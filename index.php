<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="utility.css">
    <link rel="icon" type="image/x-icon" href="svg/spotify.svg">
    <title>Spotify- Web Player: Music for everyone</title>
     <script src="script.js" defer></script>
</head>

<body>
    <div class="container flex bg-black">
        <div class="left">
            <div class="close">
                <img width="40" class="invert" src="svg/close.svg" alt="">
            </div>
            <div class="home bg-grey rounded m-1 p-1">
                <div class="logo invert"><img src="svg/logo.svg" alt="logo"></div>
                <ul>
                    <li><img class="invert" src="svg/home.svg" alt="home">Home</li>
                    <li><img class="invert" src="svg/search.svg" alt="search">Search</li>
                </ul>
            </div>
            <div class="library bg-grey rounded m-1 p-1">
                <div class="heading">
                    <img class="invert" src="svg/playlist.svg" alt="">
                    <h3>Your Library</h3>
                </div>
                <div class="songsList">
                    <ul>
                    </ul>
                </div>
                <div class="footer">
                    <div><a href="https://www.spotify.com/in-en/legal/"><span>Legal</span></a></div>
                    <div><a href="https://www.spotify.com/in-en/safetyandprivacy/"><span>Safety</span></a></div>
                    <div><a href="https://www.spotify.com/in-en/legal/privacy-policy/"><span>Privacy Policy</span></a>
                    </div>
                    <div><a href="https://www.spotify.com/in-en/legal/cookies-policy/"><span>Cookies</span></a></div>
                    <div><a href="https://www.spotify.com/in-en/accessibility/"><span>Accessibility</span></a></div>
                    <div><a href="https://www.spotify.com/legal/cookies-policy/"><span>Cookies</span></a></div>
                </div>
            </div>

        </div>
        <div class="right bg-grey rounded">
            <div class="header">
                <div class="nav">
                    <div class="hamburgerContainer">
                        <img width="40" class="invert hamburger" src="svg/hamburger.svg" alt="">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#ffff"
                        fill="none">
                        <path d="M15 6C15 6 9.00001 10.4189 9 12C8.99999 13.5812 15 18 15 18" stroke="currentColor"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#ffff"
                        fill="none">
                        <path d="M9.00005 6C9.00005 6 15 10.4189 15 12C15 13.5812 9 18 9 18" stroke="currentColor"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    </div>    
                </div>
                <div class="buttons">
                   <a class="signupbtn" href="Sign_up.php">Sign up</a>
                   <a class="loginbtn" href="log_in.php">Log in</a>
                </div>
            </div>
            <div class="spotifyPlaylists">
                <h1>Spotify-playlists</h1>
                <div class="cartContainer">
                    <!-- <div data-folder="Top_Hits_Global" class="card">
                        <div class="play">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="50" height="50"
                                fill="none">
                                <circle cx="12" cy="12" r="12" fill="#1abc54" />
                                <polygon points="8,6 16,12 8,18" fill="black" />
                            </svg>
                        </div>
                        <img src="https://charts-images.scdn.co/assets/locale_en/regional/weekly/region_global_default.jpg"
                            alt="">
                        <h2>Happy Hits!</h2>
                        <p>Hits to boost your mood and fill you with happiness!</p>
                    </div>
                    <div data-folder="Old_is_Gold" class="card">
                        <div class="play">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="50" height="50"
                                fill="none">
                                <circle cx="12" cy="12" r="12" fill="#1abc54" />
                                <polygon points="8,6 16,12 8,18" fill="black" />
                            </svg>
                        </div>
                        <img src="https://thisis-images.spotifycdn.com/37i9dQZF1DZ06evO2eNlCc-default.jpg"
                            alt="">
                        <h2>Happy Hits!</h2>
                        <p>Hits to boost your mood and fill you with happiness!</p>
                    </div> -->
                        <div class="playlistContainer">
        <ul class="playlistsUl"></ul>
    </div>
        </div>
             
                <div class="playbar invert">
                    <div class="seekbar">
                        <div class="circle">

                        </div>
                    </div>
                    <div class="abovebar">
                        <div class="songinfo">
          
                        </div>
                        <div class="songbutton">
                            <img id="previous" src="svg/previous.svg" alt="">
                            <img id="play" src="svg/playbar.svg" alt="">
                            <img id="next" src="svg/next.svg" alt="">
                        </div>
                        <div class="songtime">
    
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
  
</body>

</html>