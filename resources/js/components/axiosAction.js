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
  $(document).on('click','.step-event',function(){
    var $id = $(this).attr('data-to')

    $('.step-content').addClass('hidden')
    $(`#${$id}`).removeClass('hidden')
  })
  
};

export default AxiosAction;