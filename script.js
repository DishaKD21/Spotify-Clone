let currentSong = new Audio();
let songs = [];
let trackUrls = [];  // URLs of songs in the current playlist
let currentIndex = 0;
function secondsToMinutesSeconds(seconds) {
    if (isNaN(seconds) || seconds < 0) return "00:00";
    const minutes = Math.floor(seconds / 60);
    const secs = Math.floor(seconds % 60);
    return `${String(minutes).padStart(2, '0')}:${String(secs).padStart(2, '0')}`;
}

async function getTrendingPlaylists() {
    const res = await fetch('https://discoveryprovider.audius.co/v1/playlists/trending?limit=10');
    const json = await res.json();
    return json.data;
}

async function getTracksFromPlaylist(playlist) {
    const trackIds = playlist.playlist_contents.map(item => item.track_id);
    const tracks = [];

    for (let id of trackIds) {
        const res = await fetch(`https://discoveryprovider.audius.co/v1/tracks/${id}`);
        const data = await res.json();
        tracks.push({ title: data.data.title, artist: data.data.user.name, url: `https://discoveryprovider.audius.co/v1/tracks/${id}/stream` });
    }

    return tracks;
}

function PlayMusic(track, pause = false) {
    currentIndex = songs.findIndex(s => s.url === track.url);
    currentSong.src = track.url;
    if (!pause) {
        currentSong.play();
        play.src = "/svg/pause.svg";
    }
    document.querySelector(".songinfo").innerHTML = decodeURI(track.title);
    document.querySelector(".songtime").innerHTML = "00:00 / 00:00";
}

async function main() {
    const playlists = await getTrendingPlaylists();
    const playlistContainer = document.querySelector(".songsList ul"); // Create a <ul class=".songsList ul"></ul> in HTML

    for (let playlist of playlists) {
        const li = document.createElement("li");
        li.innerHTML = `<strong>${playlist.playlist_name}</strong> - ${playlist.user.name}`;
        li.style.cursor = 'pointer';

        li.addEventListener("click", async () => {
            const songUL = document.querySelector(".songsList ul");
            songUL.innerHTML = "Loading songs...";
            songs = await getTracksFromPlaylist(playlist);
            trackUrls = songs;

            songUL.innerHTML = "";
            for (let track of songs) {
                const trackLI = document.createElement("li");
                trackLI.innerHTML = `<img src="/svg/music.svg" alt="">
                    <div class="info">
                        <div>${track.title}</div>
                        <div>${track.artist}</div>
                    </div>
                    <div class="playnow">
                        <span>Play Now</span>
                        <img class="invert" src="/svg/playbar.svg" alt="">
                    </div>`;
                trackLI.addEventListener("click", () => {
                    PlayMusic(track);
                });
                songUL.appendChild(trackLI);
            }

            // Auto play first track (optional)
            if (songs.length > 0) {
                PlayMusic(songs[0], true);
            }
        });

        playlistContainer.appendChild(li);
    }

    // Attach play/pause/seek logic like before
    play.addEventListener("click", () => {
        if (currentSong.paused) {
            currentSong.play();
            play.src = "/svg/pause.svg";
        } else {
            currentSong.pause();
            play.src = "/svg/playbar.svg";
        }
    });

    currentSong.addEventListener("timeupdate", () => {
        document.querySelector(".songtime").innerHTML = `${secondsToMinutesSeconds(currentSong.currentTime)}/${secondsToMinutesSeconds(currentSong.duration)}`;
        document.querySelector(".circle").style.left = (currentSong.currentTime / currentSong.duration) * 100 + "%";
    });

    document.querySelector(".seekbar").addEventListener("click", e => {
        let percent = (e.offsetX / e.target.getBoundingClientRect().width) * 100;
        document.querySelector(".circle").style.left = percent + "%";
        currentSong.currentTime = ((currentSong.duration) * percent) / 100;
    });
// Optional: Add logic for next/prev if you want to navigate Audius tracks

 //add an event listener for hamburger
 document.querySelector(".hamburger").addEventListener("click",()=>{
     document.querySelector(".left").style.left = "0"
 })
 //add an event listener for close the hamburger
 document.querySelector(".close").addEventListener("click",()=>{
     document.querySelector(".left").style.left = "-120%"
 })
 
 //add an event listener to previous 
 previous.addEventListener("click",()=>{
     console.log("Previous clicked");
       if (currentIndex > 0) {
        PlayMusic(songs[currentIndex - 1]);
    }
    //  let index = songs.indexOf(currentSong.src.split("/").slice(-1) [0])
    //  if(index-1>=0){
    //      PlayMusic(songs[index-1])
    //  }
 })
 
 //add an event listener to next
 next.addEventListener("click",()=>{
     console.log("Next clicked")
     if (currentIndex < songs.length - 1) {
        PlayMusic(songs[currentIndex + 1]);
    }
    //  let index = songs.indexOf(currentSong.src.split("/").slice(-1) [0])
    //  if(index+1 < songs.length){
    //      PlayMusic(songs[index+1])
    //  }
 })

}
// const playlists = [
//     {
//         folder: "Top_Hits_Global",
//         image: "https://charts-images.scdn.co/assets/locale_en/regional/weekly/region_global_default.jpg",
//         title: "Happy Hits!",
//         description: "Hits to boost your mood and fill you with happiness!"
//     },
//     {
//         folder: "Old_is_Gold",
//         image: "https://thisis-images.spotifycdn.com/37i9dQZF1DZ06evO2eNlCc-default.jpg",
//         title: "Old is Gold",
//         description: "Classic golden tracks from the past."
//     },
//     {
//         folder: "New_Trending",
//         image: "https://i.scdn.co/image/ab67706f000000027f21d50aa6f3b4a9a7ab6c7e",
//         title: "Trending Now",
//         description: "Hot and trending tracks across the world!"
//     }
// ];
// const container = document.querySelector('.cartContainer');

// playlists.forEach(playlist => {
//     const card = document.createElement('div');
//     card.classList.add('card');
//     card.setAttribute('data-folder', playlist.folder);

//     card.innerHTML = `
//         <div class="play">
//             <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="50" height="50" fill="none">
//                 <circle cx="12" cy="12" r="12" fill="#1abc54" />
//                 <polygon points="8,6 16,12 8,18" fill="black" />
//             </svg>
//         </div>
//         <img src="${playlist.image}" alt="">
//         <h2>${playlist.title}</h2>
//         <p>${playlist.description}</p>
//     `;

//     container.appendChild(card);
// });
 main()