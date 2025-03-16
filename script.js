console.log("hello.starting javascript today");
let currentSong = new Audio();

function secondsToMinutesSeconds(seconds){
    if(isNaN(seconds) || seconds < 0){
        return "Invalid input";
    }
    const minutes = Math.floor(seconds / 60);
    const remainingSeconds = Math.floor(seconds%60);

    const formattedMinutes = String(minutes).padStart(2,'0');
    const formattedSeconds = String(remainingSeconds).padStart(2,'0');

    return `${formattedMinutes}:${formattedSeconds}`;
}

async function getSongs()
{
let a = await fetch("http://127.0.0.1:5500/songs/");
let response = await a.text();
console.log(response);
let div = document.createElement("div");
div.innerHTML = response;
let as = div.getElementsByTagName("a");
let songs = [];
for(let index=0;index < as.length ; index++){
    const element =as[index];
    if(element.href.endsWith(".mp3")){
        songs.push(element.href.split("/songs/")[1]);
    }
}
  return songs;
} 

const PlayMusic = (track,pause=false) =>{
    // let audio = new Audio("/songs/"+track)
    currentSong.src="/songs/" + track
    if(!pause){
        currentSong.play()
      play.src = "/svg/pause.svg"
    }
     
    document.querySelector(".songinfo").innerHTML = decodeURI(track);
    document.querySelector(".songtime").innerHTML = "00:00 / 00:00"
}

async function main(){

  
    //get the list of all the songs
   let songs = await getSongs() 
  PlayMusic(songs[0],true)
   //show all the songs in the playlist
  let songUL=  document.querySelector(".songsList").getElementsByTagName("ul")[0];
  for (const song of songs) {
    songUL.innerHTML = songUL.innerHTML + `<li><img src="/svg/music.svg" alt="">
                        <div class="info">
                            <div> ${song.replaceAll("%20"," ")}</div>
                            <div>Ed Sheeran</div>
                        </div>
                        <div class="playnow">
                            <span>Play Now</span>
                        <img class="invert" src="/svg/playbar.svg" alt="">
                        </div></li>`;
  }
  //attach an eventlistener to each song
  Array.from(document.querySelector(".songsList").getElementsByTagName("li")).forEach(e=>{
    e.addEventListener("click",ekement =>{
        console.log(e.querySelector(".info").firstElementChild.innerHTML);
        PlayMusic(e.querySelector(".info").firstElementChild.innerHTML.trim())
    })
     })
   
//Attach an event listener to play ,next and previous
play.addEventListener("click",()=>{
    if(currentSong.paused){
        currentSong.play()
        play.src = "/svg/pause.svg"
    }
    else{
        currentSong.pause()
        play.src ="/svg/playbar.svg"
    }
})
   
//listen for time update event
  currentSong.addEventListener("timeupdate" ,()=>{
    console.log(currentSong.currentTime , currentSong.duration)
    document.querySelector(".songtime").innerHTML = `${secondsToMinutesSeconds(currentSong.currentTime)}/${secondsToMinutesSeconds(currentSong.duration)}`;
    document.querySelector(".circle").style.left = (currentSong.currentTime /currentSong.duration)*100 + "%";
  })

  //add an event listener to seekbar
 document.querySelector(".seekbar").addEventListener("click",e=>{
    let percent= (e.offsetX/e.target.getBoundingClientRect().width)*100 ;
    document.querySelector(".circle").style.left  = percent+ "%";
    currentSong.currentTime = ((currentSong.duration)*percent)/100;
})

//add an event listener for hamburger
document.querySelector(".hamburger").addEventListener("click",()=>{
    document.querySelector(".left").style.left = "0"
})
//add an event listener for close the hamburger
document.querySelector(".close").addEventListener("click",()=>{
    document.querySelector(".left").style.left = "-120%"
})


}
main()
