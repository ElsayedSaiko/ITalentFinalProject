
$('.like').click(function(e) {
    e.preventDefault();
    var like = e.target.previousElementSibling == null;
    var postid = e.target.parentNode.dataset['postid'];
    var data = {
        isLike: like,
        post_id: postid
    }
    axios.post('/like', data).then(reponse => {
        e.currentTarget.className = "btn btn-link like active"
    })
});

$('.friend').click(function(e){
    e.preventDefault();
    var friendid = e.target.parentNode.dataset['friendid'];
    var data ={
        friend_id : friendid
    };   
    axios.post('/friend', data).then(reponse => {
        e.currentTarget.className = "btn btn-link active-like"
    })
});

