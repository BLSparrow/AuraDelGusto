let showImage = document.getElementById('showImage')
let fileImage = document.getElementById('image')

// Загрузка файла на страницу
if(fileImage) {
    fileImage.addEventListener('change', (event) => {
        let target = event.target;
        if(target.files[0] && target.files[0].type.includes('image')) {
            showImage.src = URL.createObjectURL(target.files[0]);
            showImage.onload = function () {
                URL.revokeObjectURL(target.src)
            }
        }
    });
}
