
const editLayer = document.getElementsByClassName('editLayer');
const commentBox = document.getElementsByClassName('commentBox');


function editClick(){
    editLayer[0].style.display = 'block';
    commentBox[0].style.display = 'none';
}

function showCommentBox(){
    commentBox[0].style.display = 'block';
}

function hideEdit(){
    editLayer[0].style.display = 'none';
}