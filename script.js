document.getElementById("emailForm").addEventListener("submit",function(e){e.preventDefault();const n=document.getElementById("server").value,t=document.getElementById("port").value,o=document.getElementById("username").value,a=document.getElementById("password").value,d=document.getElementById("to").value,c=document.getElementById("loading");c.style.display="block",fetch("send_email.php",{method:"POST",headers:{"Content-Type":"application/x-www-form-urlencoded"},body:new URLSearchParams({server:n,port:t,username:o,password:a,to:d})}).then(e=>e.json()).then(e=>{c.style.display="none";const n=document.getElementById("result");n.className=e.success?"result success":"result error",n.innerText=e.message}).catch(e=>{c.style.display="none";const n=document.getElementById("result");n.className="result error",n.innerText="An error occurred."})});function togglePassword(){const e=document.getElementById("password"),n=document.querySelector(".toggle-password");"password"===e.type?(e.type="text",n.innerHTML="&#128065;"):(e.type="password",n.innerHTML="&#128065;")}
