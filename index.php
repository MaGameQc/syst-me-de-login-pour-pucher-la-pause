<?php
session_start();
  if(!isset($_SESSION['id'])) {
    header("Location: login.php");
  }

 ?>

<!doctype html>
<html lang="en">

<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <!--font obitron-->
  <link href="https://fonts.googleapis.com/css?family=Orbitron&display=swap" rel="stylesheet">

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <title>Demande de pause</title>
</head>

<body style="text-align: center; display:none; background-color: #fcf9ea;" class="px-3">
  <h1>demande de pause</h1>




  <div class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Alerte</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <a></a>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="btnAccepter">accepter</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">refuser</button>
        </div>
      </div>
    </div>
  </div>




<div class="container-fluid col-12">



<div class="row">
	<div class="col-md-3 mx-auto">
	<input class="form-control" type="text" placeholder="nom pas dans la liste? écrivez le ici, ensuite Submit" id="inputBox" style="display: inline-block; text-align: center;">
	</div>
</div>

<div class="row">
  <form class="form-inline mx-auto">
    <label class="my-1 mr-2 " for="inlineFormCustomSelectPref">Agent</label>
    <select class="custom-select selectionNom my-1 mr-sm-2" id="inlineFormCustomSelectPref">
      <option selected>choisir nom...</option>
      <option value="1">Antoine Bousquet</option>
      <option value="2">Antoine Langlois</option>
      <option value="3">Cédric Sapina</option>
	  <option value="3">Danny Chénard</option>
	  <option value="3">Francis La Rivière Morin</option>
	  <option value="3">Gilles Gaudreault</option>
	  <option value="3">Jessy Darsigny</option>
	  <option value="3">Julien Van  Themsche</option>
	  <option value="3">Kariane Riendeau</option>
	  <option value="3">Percy Missengui</option>
	  <option value="3">Rémy Cotnoir Thériault</option>
	  <option value="3">Sarah Bouthillier</option>
	  <option value="3">Serge Malo</option>
	  <option value="3">Stephane Fabrice Eye</option>
	  <option value="3">Tommy Audet</option>
	  <option value="3">Thierry David 3</option>
	  <option value="3">Étienne Dolbec</option>
    </select>
	</div>



    <div class="custom-control custom-checkbox my-1 mr-sm-2">
      <input type="checkbox" class="custom-control-input" id="customControlInline">
      <label class="custom-control-label" for="customControlInline">cocher pour pause de 30 minutes</label>
    </div>


  </form>
</div>
</div>

  <button type="" class="btn btn-primary my-1" id="submit" style="">Submit</button>

  <div id="ps">

  </div>




 <script>
 function notifyMe(selectedName, text, pause) {
   if (!("Notification" in window)) {
     alert("This browser does not support system notifications");
   }
   else if (Notification.permission === "granted") {
     notify();
   }
   else if (Notification.permission !== 'denied') {
     Notification.requestPermission(function (permission) {
       if (permission === "granted") {
         notify();
       }
     });
   }
   function notify() {
     var notification = new Notification(selectedName, {
       icon: 'https://rocky-lowlands-97412.herokuapp.com/',
       body: selectedName + text + pause,
     });
     notification.onclick = function () {
       window.open("https://rocky-lowlands-97412.herokuapp.com/");
     };
     setTimeout(notification.close.bind(notification), 30000);
   }
 }
 /* mettre un pop() apres click sur deny
delete instances.instance3;*/
$(document).ready(function() {
$("body").fadeIn(2000);
  var compteur = 0;
  var arrayAgent = [];
  var selectedName = "";
  var souhait = " souhaite prendre une ";
  var retard = " est en retard ! ";
  var totalTimerDiv;
  $("#submit").on("click", function() {
//check mon input text si j'ai enter dequoi
    if($("#inputBox").val() != ""){
			selectedName = $("#inputBox").val();
      $("#inputBox").val("");
		} else{
			selectedName = $("#inlineFormCustomSelectPref").children("option:selected").text();
      $("#inputBox").val("");
		}
  //set pause if checkbox is checked or not
  if ($("#customControlInline").prop("checked") == true) {
    pause = " pause de 30 min. ";
  }
  if ($("#customControlInline").prop("checked") == false) {
    pause = " pause de 15 min. ";
  }
//show modal
  $(".modal").modal("show");
  $(".modal").find(".modal-body").append(selectedName + " souhaite prendre une " + pause + "<br>");
  notifyMe(selectedName, souhait, pause);
  });
  //if i click on accept
  $(document).on("click", "#btnAccepter", function(){
        compteur++
  for (i = compteur - 1; i < compteur; i++) {
        arrayAgent.push(new Agents(selectedName, pause, i));
        // totalTimerDiv = $("#ps div").length;
/////////////////////////////////////////////////////////////////////////////////////
//add <p>
        // $("#timerDiv_"+i).eq(i).append("<p></p>").css({"font-size" : "1.2rem"});
        // // $(".timerDiv p").eq(i).append("<button>stop</button>");
        // console.log($("#timerDiv"+i).attr());
//add button
        // $("#ps button").eq(i).attr("id", "btnStop_" + i);
        // $("#ps button").addClass("btn btn-primary p-1");
        // $("#ps button").eq(i).on("click", function(){$("#ps div").eq(i).remove();});
/////////////////////////////////////////////////////////////////////////
              // $("button").eq(i).attr("id", "btnStart" + i);
              // $("button").eq(i +1).addClass("btn btn-secondary");
              if ($("#customControlInline").prop("checked") == true) {
                  arrayAgent[i].temps(selectedName, pause, 1800000, i);
                  $(".timerDiv p").eq(i).attr("id", "tester" + i).css("background-color" , "#6fd99b");
              }
              if ($("#customControlInline").prop("checked") == false) {
                  arrayAgent[i].temps(selectedName, pause, 900000, i);
                  $(".timerDiv p").eq(i).attr("id", "tester" + i).css("background-color" , "#88d7e3");
              }
              $(".modal").modal("hide");
              //if the modal is hidden
                  if($(".modal").on("hide.bs.modal")){
                    $(".modal").find(".modal-body").html("");
                  }
      }
    });
  function Agents(nom, tempsString) {
  this.nom = nom;
  this.tempsString = tempsString;
  this.temps = function(agent, pauseDurationString, pauseDuration, increment) {
//suppression de div à prévoir
    $("#ps").append("<div></div>").css({"font-size" : "1.2rem"});
    $("#ps div").eq(increment).addClass("timerDiv rounded");
    $(".timerDiv").eq(increment).append("<p></p>").css({"font-size" : "1.2rem" , "padding" : "4px 4px", "background-color" : "rgba(251, 146, 36, 0.4)", "margin" : "0.5% 0", "box-shadow" : "0 0 16px grey"});
	if(compteur % 2 == 0){ $(".timerDiv").eq(increment).css({"background-color" : "rgba(52, 140, 235, 0.4)", "padding" : "4px 4px " , "margin" : "0.5% 0"});}
    $(".timerDiv p").eq(increment).after("<button>stop</button>");
    $(".timerDiv button").eq(increment).addClass("btn btn-secondary btnStop");


    $(".btnStop").eq(increment).on("click", function(){
      // $(".timerDiv").eq(increment).remove();
      // arrayAgent.splice(increment, 1);
      clearInterval(x);
      $("#tester"+increment).css("background-color" , "grey");
      return;
    });


    var countDownDate = new Date().getTime();
    // Update the count down every 1 second
    var x = setInterval(function() {
      // Get todays date and time
      var now = new Date().getTime();
      // Find the distance between now and the count down date
      var distance = (countDownDate + pauseDuration) - now;
      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);
      // Display the result in the element with id="demo"
      document.getElementById("tester" + increment).innerHTML =
      minutes + "m " + seconds + "s "+ agent + pauseDurationString;
      // If the count down is finished, write some text
      if (distance < 0) {
        	var modalText = [];
          $('#btnAccepter').attr("disabled", true);
        $(".modal").modal("show");
        clearInterval(x);
        document.getElementById("tester" + increment).innerHTML = "EXPIRED";
        $("#tester" + increment).css("background-color", "red");
        modalText.push(agent + " est en retard ! " + pauseDurationString + "<br>");
        notifyMe(agent, retard, pauseDurationString );
        for(i=0; i<modalText.length; i++){
					$(".modal").find(".modal-body").append(modalText[i]);
				 }
         $(".modal").on("hide.bs.modal", function(){
					$('#btnAccepter').removeAttr("disabled");
          $(".modal").find(".modal-body").html("");
				 });
///////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////
        // var minutesLabel = document.getElementById("minutes");
        // var secondsLabel = document.getElementById("seconds");
        var totalSeconds = 0;
        var timerOut = setInterval(setTime, 1000);
        $(".btnStop").eq(increment).on("click", function(){
          // $(".timerDiv").eq(increment).remove();
          // arrayAgent.splice(increment, 1);
        clearInterval(timerOut);
         return;
        });
        function setTime() {
          ++totalSeconds;
          document.getElementById("tester" + increment).innerHTML = agent + " en retard depuis :  " + pad(parseInt(totalSeconds / 60)) + " : " + pad(totalSeconds % 60);
          // document.getElementById("tester"+ incrementId).innerHTML = pad(parseInt(totalSeconds/60));
        }
        function pad(val) {
          var valString = val + "";
          if (valString.length < 2) {
            return "0" + valString;
          } else {
            return valString;
          }
        }
      }
    }, 1000);
  }
}
});
////////////////////////////////////////////
  </script>



  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
