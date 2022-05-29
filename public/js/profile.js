let edit_profile = getElm("edit_profile");
let cancel_profile = getElm("cancel_profile");
let save_profile = getElm("save_profile");
let info = getAllElm("info");
let list_edit = getElm("list_edit");
let form = getElm("form");
let formURL = form.action;
let profile_iamge = getElm("profile_iamge");
let profile_image_input = getElm("profile_image_input");
let all_input_profile = getAllElm("input_profile");

edit_profile.addEventListener("click",()=>
{
    hideAll(info)
    showAll(all_input_profile)
    hide(edit_profile)
    show(list_edit)
})
cancel_profile.addEventListener("click",()=>
{
    showAll(info)
    hideAll(all_input_profile)
    show(edit_profile)
    hide(list_edit)
})



save_profile.addEventListener("click",()=>
{
    let formdata = new FormData(form);
    fetch(formURL ,
    {
        method: "post" ,
        body  : formdata
    })
    .then(resp=>resp.json())
    .then(data=>{
        removeErrors()
        if(data.errors)
        {
            for(error in data.errors)
            {
                let input_has_error = getElm(`error_${error}`);
                input_has_error.classList.add("is-invalid");
                let error_msg = data.errors[error];
                let error_div = "<div class='invalid-feedback'>"+error_msg[0]+"</div>";
                input_has_error.insertAdjacentHTML("afterend" , error_div)
            }
        }else
        {
            console.log("re")
            window.location.reload();
        }
    })
})


function removeErrors()
{
    let invalidDivs = getAllElm('invalid-feedback');
    if(invalidDivs)
    {
        invalidDivs.forEach(element => {
            element.remove()
        });
    }
}

profile_iamge.addEventListener("click",()=>
{
    profile_image_input.click()
})


singleUpload(profile_image_input , ALLOWD_TYPE_IMAGE , ALLOWD_SIZE ,showImagePorfile);

function showImagePorfile(imagesrc)
{
    profile_iamge.src =  imagesrc;
}
