const form=document.querySelector(".typing-area"),
inputField=form.querySelector("#inputfield"),
sendbutton=form.querySelector("button"),
chatbox=document.querySelector(".area");
form.onsubmit=(e)=>{
    e.preventDefault();
}

sendbutton.onclick=()=>{
    let xhr=new XMLHttpRequest();
    xhr.open("POST" , "php/chat_php.php",true);
    xhr.onload=()=>{
        if(xhr.readyState===XMLHttpRequest.DONE){
            if(xhr.status===200){ 
                inputField.value="";
            }
        }
    }
    let formdata=new FormData(form);
    xhr.send(formdata);
}

function scrollToBottom() {
    chatbox.scrollTop = chatbox.scrollHeight;
  }

function isChatboxAtBottom() {
    return chatbox.scrollHeight - chatbox.scrollTop === chatbox.clientHeight;
  }
  
  let isScrollingUp = false;
  chatbox.addEventListener("scroll", () => {
    isScrollingUp = !isChatboxAtBottom();
  });
  
function fetchMessages(){
    let xhr=new XMLHttpRequest();
    xhr.open("POST" , "php/get_msg.php",true);
    xhr.onload=()=>{
        if(xhr.readyState===XMLHttpRequest.DONE){
            if(xhr.status===200){
                let data=xhr.response; 
               chatbox.innerHTML=data;
               if (!isScrollingUp) {
                scrollToBottom();
              }
            }
        }
    }
    let formdata=new FormData(form);
    xhr.send(formdata);
}
fetchMessages();

setInterval(() => {
  fetchMessages();
}, 500);