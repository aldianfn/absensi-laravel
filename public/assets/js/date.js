function formattedTime() {
    var currentDate = new Date();

    var time = ('0' + currentDate.getHours()).slice(-2) + ':' +
        ('0' + currentDate.getMinutes()).slice(-2) + ':' +
        ('0' + currentDate.getSeconds()).slice(-2);

    return time;
}

function formattedDate() {
    var currentDate = new Date();

    var date = ('0' + currentDate.getDate()).slice(-2) + '-' + 
        ('0' + (currentDate.getMonth() + 1)).slice(-2) + '-' +
        (currentDate.getFullYear());

    return date;
}

function updateTime() {
    var currentTime = formattedTime();
    document.getElementById('clock').textContent = currentTime;
}

function updateDate() {
    var currentDate = formattedDate();
    document.getElementById('date').textContent = currentDate;
}

updateTime();
setInterval(updateTime, 1000);