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
            idSpan.innerHTML = '중복되지 않은 ID입니다.';
        }
    })
    .catch(error => alert(error.message));
}

const chkPwMsg = document.getElementById('chk_pw_msg');

function chkPassword() {
    const p1 = document.getElementById('pw').value;
    const p2 = document.getElementById('pwChk').value;
    if( p1 !== p2 ) {
        chkPwMsg.style.color = 'red';
        chkPwMsg.innerHTML = '비밀번호가 일치하지 않습니다.';
    } else {
        chkPwMsg.style.color = 'green';
        chkPwMsg.innerHTML = '비밀번호가 일치합니다.';
    }
}