const form=document.querySelector(".form_signup form"),
continuebtn=form.querySelector(".button input"),
errortext=form.querySelector(".error_text");

form.onsubmit=(e)=>{
    e.preventDefault();
}
continuebtn.onclick=()=>{
    let xhr=new XMLHttpRequest();
    xhr.open("POST" , "php/login.php",true);
    xhr.onload=()=>{
        if(xhr.readyState===XMLHttpRequest.DONE){
            if(xhr.status===200){
                let data=xhr.response;
                if(data== "Successfully login"){
                    location.href='user_interface.php';
                }else{
                    errortext.style.display="block";
                    errortext.textContent=data;
                }
            }
        }
    }
    let formdata=new FormData(form);
    xhr.send(formdata);
}