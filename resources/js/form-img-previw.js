const placeHolder = 'https://media.istockphoto.com/id/1357365823/vector/default-image-icon-vector-missing-picture-page-for-website-design-or-mobile-app-no-photo.jpg?s=612x612&w=0&k=20&c=PM_optEhHBTZkuJQLlCjLz-v3zzxp-1mpNQZsdjrbns=';
const imageInput = document.getElementById('image');
const imagePreview = document.getElementById('img-prev');
imageInput.addEventListener('change', () => {

    console.log('culo');
    if (imageInput.files && imageInput.files[0]) {
        const reader = new FileReader();
        reader.readAsDataURL(imageInput.files[0]);
        reader.onload = e => {
            imagePreview.src = e.target.result;
        }
    }
    else imagePreview.src = placeHolder;
})