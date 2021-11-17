const all = document.querySelector("#all");

const gangnam = document.querySelector("#gangnam");
const dong_gangnam = document.querySelector(".dong-gangnam");

const mapo = document.querySelector("#mapo");
const dong_mapo = document.querySelector(".dong-mapo");

const songpa = document.querySelector("#songpa");
const dong_songpa = document.querySelector(".dong-songpa");

const yongsan = document.querySelector("#yongsan");
const dong_yongsan = document.querySelector(".dong-yongsan");

const jongro = document.querySelector("#jongro");
const dong_jongro = document.querySelector(".dong-jongro");

gangnamcnt=0;
gangnam.addEventListener('click', ()=>{
    if (gangnamcnt === 0){
        if (jongrocnt===1 || songpacnt===1 || yongsancnt===1 || mapocnt===1);
        else{ 
            dong_gangnam.style.display = 'initial';
            gangnamcnt=1;
        }
    } else{
        dong_gangnam.style.display = 'none';
        gangnamcnt=0;
    }
});

mapocnt=0;
mapo.addEventListener('click', ()=>{
    if (mapocnt === 0){
        if (gangnamcnt===1 || songpacnt===1 || yongsancnt===1 || jongrocnt===1);
        else {
            dong_mapo.style.display = 'initial';
            mapocnt=1;
        }
    } else{
        dong_mapo.style.display = 'none';
        mapocnt=0;
    }
});

songpacnt=0;
songpa.addEventListener('click', ()=>{
    if (songpacnt === 0){
        if (gangnamcnt===1 || jongrocnt===1 || yongsancnt===1 || mapocnt===1);
        else {
            dong_songpa.style.display = 'initial';
            songpacnt=1;
        }
    } else{
        dong_songpa.style.display = 'none';
        songpacnt=0;
    }
});

yongsancnt=0;
yongsan.addEventListener('click', ()=>{
    if (yongsancnt === 0){
        if (gangnamcnt===1 || songpacnt===1 || jongrocnt===1 || mapocnt===1);
        else {
            dong_yongsan.style.display = 'initial';
            yongsancnt=1;
        }
    } else{
        dong_yongsan.style.display = 'none';
        yongsancnt=0;
    }
});

jongrocnt=0;
jongro.addEventListener('click', ()=>{
    if (jongrocnt === 0){ 
        if (gangnamcnt===1 || songpacnt===1 || yongsancnt===1 || mapocnt===1);
        else {
            dong_jongro.style.display = 'initial';
            jongrocnt=1;
        }
    } else {
        dong_jongro.style.display = 'none';
        jongrocnt=0;
    }
});
