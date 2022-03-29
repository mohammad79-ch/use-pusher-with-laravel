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
