function countdown()
{
    //y, m, d, h
    wanted = [2018, 3, 26, 8];
    date = new Date;
    year = date.getFullYear();
    month = date.getMonth() + 1;
    d = date.getDate();
    day = date.getDay();
    h = date.getHours();
    m = date.getMinutes();
    s = date.getSeconds();

    setTimeout(date_time() ,'1000');
    return true;
}