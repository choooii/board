function chkDuplication() {
    const id = document.getElementById("id");
    const url = "/api/user?id=" + id.value;

    // API
    fetch(url)
    .then(data => {
        if(data.status !== 200){
            throw new Error(data.status + ' : API Response Error')
        }
        return data.json();
    })
    .then(apiData => {
        const idSpan = document.getElementById('errMsgId');
        if (apiData['flg'] === '1') {
            idSpan.innerHTML = apiData["msg"];
        } else {
            idSpan.innerHTML = "";
        }
    })
    .catch(error => alert(error.message));
}

