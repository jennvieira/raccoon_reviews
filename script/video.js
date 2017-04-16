(function (){

"use strict";
console.log("Seaf fired");

var video = document.querySelector("#mov_trailer"),
    playpause = document.querySelector(".playpause"),
    muteunmute = document.querySelector(".muteunmute");

    playpause.addEventListener("click", playpauseVid, false);
    muteunmute.addEventListener("click", muteunmuteVid, false);

    function playpauseVid(e){
      e.preventDefault();
      if (video.paused) {
        video.play();
        playpause.innerHTML = '<img src="img/controls/pause.svg" class="pausebut" alt="Pause Button">';

      }else{
        video.pause();
        playpause.innerHTML = '<img src="img/controls/play.svg" class="playbut" alt="Play Button">';
      }
    }

    function muteunmuteVid(e){
      e.preventDefault();
      if(video.muted == false){
        video.muted = true;
        muteunmute.innerHTML = '<img src="img/controls/mute.svg" class="unmutebut" alt="Unmute Button">';
      }else{
        video.muted = false;
        muteunmute.innerHTML = '<img src="img/controls/volume_full.svg" class="mutebut" alt="Mute Button">';

      }
    }


})();
