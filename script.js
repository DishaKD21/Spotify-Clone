console.log("hello.starting javascript today");

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

async function main(){
    //get the list of all the songs
   let songs = await getSongs() 
  
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
   

   
}
main()
