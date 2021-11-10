const all = document.querySelector("#all");
const gangnamBtn = document.querySelector("#gangnam");
const mapoBtn = document.querySelector("#mapo");
const songpaBtn = document.querySelector("#songpa");
const yongsanBtn = document.querySelector("#yongsan");
const jongroBtn = document.querySelector("#jongro");
const koreanBtn = document.querySelector("#korean");
const chineseBtn = document.querySelector("#chinese");
const japaneseBtn = document.querySelector("#japanese");

const reviewList = document.querySelector("#review-list");

function createList(btn) {
    
}

allcnt = 0;
all.addEventListener('click', () => {
    if(allcnt === 0) {
        createList(all);
        reviewList.style.display = 'initial';
        allcnt = 1;
    } else {
        reviewList.style.display = 'none';
        allcnt = 0;
    }
});

gangnamcnt = 0;
gangnamBtn.addEventListener('click', () => {
    if(gangnamcnt === 0) {
        createList(gangnamBtn);
        reviewList.style.display = 'initial';
        gangnamcnt = 1;
    } else {
        reviewList.style.display = 'none';
        gangnamcnt = 0;
    }
});

mapocnt = 0;
mapoBtn.addEventListener('click', () => {
    if(mapocnt === 0) {
        createList(mapoBtn);
        reviewList.style.display = 'initial';
        mapocnt = 1;
    } else {
        reviewList.style.display = 'none';
        mapocnt = 0;
    }
});

songpacnt = 0;
songpaBtn.addEventListener('click', () => {
    if(songpacnt === 0) {
        createList(songpaBtn);
        reviewList.style.display = 'initial';
        songpacnt = 1;
    } else {
        reviewList.style.display = 'none';
        songpacnt = 0;
    }
});

yongsancnt = 0;
yongsanBtn.addEventListener('click', () => {
    if(yongsancnt === 0) {
        createList(yongsanBtn);
        reviewList.style.display = 'initial';
        yongsancnt = 1;
    } else {
        reviewList.style.display = 'none';
        yongsancnt = 0;
    }
});

jongrocnt = 0;
jongroBtn.addEventListener('click', () => {
    if(jongrocnt === 0) {
        createList(jongroBtn);
        reviewList.style.display = 'initial';
        jongrocnt = 1;
    } else {
        reviewList.style.display = 'none';
        jongrocnt = 0;
    }
});

koreancnt = 0;
koreanBtn.addEventListener('click', () => {
    if(koreancnt === 0) {
        createList(koreanBtn);
        reviewList.style.display = 'initial';
        koreancnt = 1;
    } else {
        reviewList.style.display = 'none';
        koreancnt = 0;
    }
});

chinesecnt = 0;
chineseBtn.addEventListener('click', () => {
    if(chinesecnt === 0) {
        createList(chineseBtn);
        reviewList.style.display = 'initial';
        chinesecnt = 1;
    } else {
        reviewList.style.display = 'none';
        chinesecnt = 0;
    }
});

japanesecnt = 0;
japaneseBtn.addEventListener('click', () => {
    if(japanesecnt === 0) {
        createList(japaneseBtn);
        reviewList.style.display = 'initial';
        japanesecnt = 1;
    } else {
        reviewList.style.display = 'none';
        japanesecnt = 0;
    }
});