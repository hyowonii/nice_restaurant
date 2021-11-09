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


gangnam.addEventListener('click', ()=>{
    dong_gangnam.style.display = 'initial';
});
mapo.addEventListener('click', ()=>{
    dong_mapo.style.display = 'initial';
});
songpa.addEventListener('click', ()=>{
    dong_songpa.style.display = 'initial';
});
yongsan.addEventListener('click', ()=>{
    dong_yongsan.style.display = 'initial';
});
jongro.addEventListener('click', ()=>{
    dong_jongro.style.display = 'initial';
});

function searchResult(){
    window.location.href = 'searchlist.html';
};