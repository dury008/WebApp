/* CSE3026 : Web Application Development
 * Lab 09 - Maze
 */
"use strict";

var loser = false;  // whether the user has hit a wall
window.onload = function() {
	var walls = $$("div.boundary");
	for(var i = 0 ; i < walls.length ; i++){
		walls[i].observe("mouseover",overBoundary);
	}

	$("end").observe("mouseover",overEnd);
	$("start").observe("click",startClick);
};

// called when mouse enters the walls;
// signals the end of the game with a loss
function overBoundary(event) {
	if($("status").innerHTML != "you win!"){
		var walls = $$("div.boundary");
		for(var i = 0 ; i < walls.length ; i++){
			walls[i].addClassName("youlose");
		}
		loser = true;
	}
}

// called when mouse is clicked on Start div;
// sets the maze back to its initial playable state
function startClick() {
	var walls = $$("div.youlose");
	for(var i = 0 ; i < walls.length ; i++){
		walls[i].removeClassName("youlose");
	}
	loser = false;
	$("status").innerHTML = 'Click the "S" to begin.';

	document.body.observe("mouseover",overBody);
}

// called when mouse is on top of the End div.
// signals the end of the game with a win
function overEnd() {
	if(loser === false){
		$("status").innerHTML = "you win!";


	}
	else{
		$("status").innerHTML = "you lose!";
	}


}

// test for mouse being over document.body so that the player
// can't cheat by going outside the maze
function overBody(event) {
	if(event.element() == document.body && loser === false){
		overBoundary();
	}
}
