userslist=document.querySelector(".users .users_list");
searchbar=document.querySelector(".users .search_user input")
searchtab=document.querySelector(".users .user_search");

searchtab.onclick=()=>{
    searchbar.value="";
}


searchbar.onkeyup=()=>{
    let searchterm=searchbar.value;
    if(searchterm!=""){
        searchbar.classList.add("active");
        let xhr=new XMLHttpRequest();
        xhr.open("POST" , "php/search.php",true);
        xhr.onload=()=>{
            if(xhr.readyState===XMLHttpRequest.DONE){
                if(xhr.status===200){
                    let data=xhr.response;
                    userslist.innerHTML=data;
                }
            }
        }
        xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded")
        xhr.send("searchterm=" +searchterm);
    }
    else{
        searchbar.classList.remove("active");
    }
}

setInterval(()=>{
    let xhr=new XMLHttpRequest();
    xhr.open("GET" , "php/users.php",true);
    xhr.onload=()=>{
        if(xhr.readyState===XMLHttpRequest.DONE){
            if(xhr.status===200){
                let data=xhr.response;
                if(!searchbar.classList.contains("active")){
                userslist.innerHTML=data;
                }
            }
        }
    }
    xhr.send();
},500)