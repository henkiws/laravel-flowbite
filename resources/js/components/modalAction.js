import $ from "jquery";
import { Modal } from 'flowbite';
  
  const ModalAction = () => {
    $(document).on('click','.btn-add-new',function(){
        var modalTarget = $(this).attr('data-modal-target')
        var urlAction = $(this).attr('data-action')

        // remove input
        removeInput('id')
        removeInput('_method')

        // change form action
        $(`#form${modalTarget}`).attr('action',urlAction)

        // reset form
        $(`#form${modalTarget}`)[0].reset()

        const $targetEl = document.getElementById(modalTarget);
        OpenModal($targetEl)
        
    })

    $(document).on('click','.close-modal',function() {
      var id = $(this).attr('data-modal-hide')
      const $targetEl = document.getElementById(id);
      ClosedModal($targetEl)
    })

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

    function ClosedModal($targetEl) {
      const modal = new Modal($targetEl);
      modal.hide();
    }

    function removeInput(inputName) {
      $('input[name="'+inputName+'"]').remove()
    }
    
  };
  
  export default ModalAction;
  