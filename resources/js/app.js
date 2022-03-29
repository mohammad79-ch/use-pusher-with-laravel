require('./bootstrap');

Echo.private("notifications")
    .listen("UserSessionChanged" ,(e)=>{
        let notificationElement = document.getElementById("notification");
        notificationElement.classList.remove("invisible");
        notificationElement.classList.remove("alert-success");
        notificationElement.classList.remove("alert-danger");
        notificationElement.classList.add("alert-" + e.type);
        notificationElement.textContent = e.message;
    })

Echo.channel("posts")
    .listen("ceratedPostEvent", (e) => {
        let postsBox = document.getElementById("box_posts");
        let newItem;
        newItem = `
             <img src="assets/posts/${e.post.file}" width="90%" height="250" alt="">
                             <div class="d-flex">
                                 <p class="font-weight-bold" style="margin-right: 10px;font-weight: bold">${e.post.title}</p>
                             </div>
                             <p>${e.post.content}</p>
            `
        postsBox.innerHTML += newItem;
    })
