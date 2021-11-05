"use strict";

window.onload = function() {
	buttonFunction();
}

function buttonFunction(){

	var btn = document.getElementById("lookup")
	btn.addEventListener("click" , async function(e){

		e.target.preventDefault;

		var input = document.getElementById("country").value
		var results = document.getElementById("result")
		var url = "world.php?country="+input+"&context="

		results.innerHTML = "";


		await fetch(url)
			.then(async response => {
				if(response.ok) {
					let data = await response.text()
					
					results.innerHTML = ""+data;
					switchColor()
					return;

				}else{
					return Promise.reject("Response was not 200")
				}
			})
			.catch(error => {
				console.log("An error occured with the connection. Error is : "+ error)
			})



	})

	var btn_cities = document.getElementById("lookup-cities")
	btn_cities.addEventListener("click", async function(f){

		f.target.preventDefault;

		var input = document.getElementById("country").value
		var results = document.getElementById("result")
		var url = "world.php?country="+input+"&context=cities"

		results.innerHTML = "";


		await fetch(url)
			.then(async response => {
				if(response.ok) {
					let data = await response.text()
					
					results.innerHTML = ""+data;
					switchColor()
					return;

				}else{
					return Promise.reject("Response was not 200");
				}
			})
			.catch(error => {
				console.log("An error occured with the connection. Error is : "+ error)
			})


	})
}

function switchColor() {

	var rows = document.getElementsByTagName("tr");
	for (let x= 0 ; x < rows.length; x++){
		if (x%2 == 0){
			rows[x].classList.add("lightblue");

		}else{
			rows[x].classList.add("white");
		}
	}
}