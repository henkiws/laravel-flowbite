import $ from "jquery";
import axios from "axios";
import { Modal } from 'flowbite';

const AxiosAction = () => {
  $(document).on('click','.btn-edit',function(){
    var id = $(this).attr('data-id')
    var modalTarget = $(this).attr('data-modal-target')
    var urlAction = $(this).attr('data-action')

    axios.get(urlAction)
        .then(function (response) {
          console.log(response);
          if( modalTarget != '' ) {
            // add new field method PUT
            addInput('#form'+modalTarget, '_method', 'PUT')
            // add new field id
            addInput('#form'+modalTarget, 'id', id)

            console.log( response.data.data )

            Object.keys(response.data.data).forEach(function(key) {
              if( key == "image" || key == "path" ) {
                $(`input[name="${key}"]`).prop('required',false)
              }else if( key == "description" ) {
                $(`textarea[name="${key}"]`).val(response.data.data[key])
              }else if( key == "active" ) {
                $(`select[name="${key}"]`).val(response.data.data[key]).trigger('change')
              }else{
                $(`input[name="${key}"]`).val(response.data.data[key])
              }
            });

            $(`#form${modalTarget}`).attr('action',urlAction)

            const $targetEl = document.getElementById(modalTarget);
            OpenModal($targetEl)
          }
        })
        .catch(function (error) {
          console.log(error);
        })
  })

  $(document).on('click','.btn-delete-confirmation',function(){
    var id = $(this).attr('data-id')
    var modalTarget = $(this).attr('data-modal-target')
    var urlAction = $(this).attr('data-action')

    // add new field method PUT
    addInput('#form'+modalTarget, '_method', 'delete')

    // change form action
    $(`#form${modalTarget}`).attr('action',urlAction)

    const $targetEl = document.getElementById(modalTarget);
    OpenModal($targetEl)
  })

  function addInput(targetEl, inputName,inputValue) {
    if (! $('input[name="'+inputName+'"]').length) {
      $('<input>', {
        type: "hidden",
        name: inputName,
        value: inputValue
      }).appendTo(targetEl)
    }else{
      $('input[name="'+inputName+'"]').val(inputValue)
    }
  }

  function OpenModal($targetEl) {
    const options = {
      placement: 'bottom-right',
      backdrop: 'dynamic',
      backdropClasses: 'bg-gray-900/50 dark:bg-gray-900/80 fixed inset-0 z-40',
      closable: false,
      onHide: () => {
          console.log('modal is hidden');
      },
      onShow: () => {
          console.log('modal is shown');
      },
      onToggle: () => {
          console.log('modal has been toggled');
      }
    };

    const modal = new Modal($targetEl, options);
    modal.show();
  }

  // step event
  // $(document).on('click','.step-event',function(){
  //   var $id = $(this).attr('data-to')

  //   var class_selected = "text-green-700 bg-green-100 border border-green-300 rounded-lg dark:bg-gray-800 dark:border-green-800 dark:text-green-400"
  //   var class_default = "text-gray-900 bg-gray-100 border border-gray-300 rounded-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"

  //   $('.step-content').addClass('hidden')
  //   $(`#${$id}`).removeClass('hidden')

  //   $('.step-event').removeClass(class_default)
  //   $('.step-event').removeClass(class_selected)

  //   $('.step-event').addClass(class_default)
  //   $(`[data-to="${$id}"]`).addClass(class_selected)
  // })

  // box add new
  $(document).on('click','.box-add-new',function(){
    var $target = $(this).attr('data-target')
    var $prepend = $(this).attr('data-prepend')
    var $form = $(this).attr('data-form')

    $(`input[name="${$target}"]`).trigger('click')

    // previewImage($target, $prepend)
    onChangeImage($target, $form)
  })

  function onChangeImage($target, $form) {
    $(document).on('change',`input[name="${$target}"]`,function(){
      submitForm($form)
    })
  }


  function previewImage($target, $prepend) {
    $(document).on('change',`input[name="${$target}"]`,function(e){
      $(`.${$prepend} .col-span-1`).remove()
      let $box_add_new = `<div class="col-span-1">
                              <div class="flex items-center justify-center w-full">
                                  <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-52 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600 box-add-new" data-target="${$target}" data-prepend="${$prepend}">
                                      <div class="flex flex-col items-center justify-center pt-6 pb-6">
                                          <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                          </svg>
                                          <p class="text-sm text-gray-500 dark:text-gray-400">Choose Files</p>
                                      </div>
                                  </label>
                                  <input type="file" name="${$target}" multiple class="hidden" accept="image/*">
                              </div> 
                          </div>`;
      for (var i = 0; i < $(this)[0].files.length; i++) {
        // <button type="button" class="w-9 h-9 text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100  focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 dark:bg-gray-800">
        //                                 <svg class="w-7 h-7 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
        //                                     <path fill-rule="evenodd" d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z" clip-rule="evenodd"/>
        //                                     <path fill-rule="evenodd" d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z" clip-rule="evenodd"/>
        //                                 </svg>
        //                       </button>
        let $box = ` <div class="col-span-1">
                      <div class="relative items-center justify-center w-full">
                          <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-52 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                              <div class="pt-5 pb-6">
                                  <img class="w-full h-52" src="${window.URL.createObjectURL(this.files[i])}">
                              </div>
                          </label>
                          <div class="absolute flex top-0 right-0 py-3 h-20 w-20">
                            
                              <button type="button" class="w-9 h-9 text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100  focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 dark:bg-gray-800">
                                  <svg class="w-7 h-7 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                      <path fill-rule="evenodd" d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd"/>
                                  </svg>
                              </button>
                          </div>
                      </div> 
                  </div>
              `;
        $(`.${$prepend}`).prepend($box)
      }

      $(`.${$prepend}`).append($box_add_new)

    })
  }

  // next - previous Step
  $(document).on('click','.btn-step',function(){
    var $target = $(this).attr('data-target')
    var $action = $(this).attr('data-action')
    var $form = $(this).attr('data-form')

    if( $action == "next" ) {
      submitForm($form)
    }else if( $action == "href" ) {
      window.location = $target
    }

    var class_selected = "text-green-700 bg-green-100 border border-green-300 rounded-lg dark:bg-gray-800 dark:border-green-800 dark:text-green-400"
    var class_default = "text-gray-900 bg-gray-100 border border-gray-300 rounded-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"

    $('.step-content').addClass('hidden')
    $('.step-event').removeClass(class_default)
    $('.step-event').removeClass(class_selected)

    $('.step-event').addClass(class_default)

    if( $action == "confirmation" ) {

    }else if( $action == "previous" ) {
      $(`#${$target}`).removeClass('hidden')
      $(`[data-to="${$target}"]`).addClass(class_selected)
    }else {
      $(`#${$target}`).removeClass('hidden')
      console.log( $target )
      $(`[data-to="${$target}"]`).addClass(class_selected)
    }
  })

  function submitForm($form) {
    $(`#${$form}`).submit()
  }

  $(document).on('click','.href',function(e){
    e.preventDefault()
    window.location.href = $(this).attr('data-action')
  })
  
};

export default AxiosAction;