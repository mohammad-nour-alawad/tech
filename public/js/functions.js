const btn = document.querySelector(".rating-container button");
const post = document.querySelector(".rating-container .post");
const widget = document.querySelector(".rating-container .star-widget");
const editBtn = document.querySelector(".rating-container .edit");
const rate = document.querySelector(".rating-container");
function showRate() {
    $(".rating-container").css("top", "300px");
    widget.style.display = "block";
    post.style.display = "none";
    $(".rate-1").css("checked", "none");
}
if (btn) {
    btn.onclick = () => {
        widget.style.display = "none";
        post.style.display = "block";
        return false;
    }
}

const img = document.getElementById('profile-pic');
const file = document.getElementById('file-reader');
if (file) {
    file.addEventListener('change', function () {
        const choosedfile = this.files[0];
        if (choosedfile) {
            const fr = new FileReader();
            fr.addEventListener('load', function () {
                img.setAttribute('src', fr.result);
            });
            fr.readAsDataURL(choosedfile);
        }
    });
}

Brochour = document.getElementById('Brochour');
fileChooser = document.getElementById('file-reader');
if (fileChooser) {
    fileChooser.addEventListener('change', function () {
        const choosedfile = this.files[0];
        if (choosedfile) {
            const fr = new FileReader();
            fr.addEventListener('load', function () {
                Brochour.setAttribute('src', fr.result);
            });
            fr.readAsDataURL(choosedfile);
        }
    });
}