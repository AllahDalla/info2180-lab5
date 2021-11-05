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
		var url = "world.php?country="+input

		results.innerHTML = "";


		await fetch(url)
			.then(async response => {
				if(response.ok) {
					let data = await response.text()
					
					results.innerHTML = ""+data;
					return console.log(data);

				}else{
					return Promise.reject("Response was not 200")
				}
			})
			.catch(error => {
				console.log("An error occured with the connection. Error is : "+ error)
			})



	})
}