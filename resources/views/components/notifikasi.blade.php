<div>

         <div x-data="{open:false}"
         x-show="open"
         @notifity.window="Toastify({
              text: $event.detail.message,
              duration:3000,
              newWindow:true,
              close:true,
              gravity:'top',
              position:'right',
              stopOnFokus:true,
              style:{
              background: ($event.detail.title === 'success') ? 'linear-grandient(to right, #80AF81, #96C9F4)' : 'linear-gradient(to right, #C80036, #F4CE14)',
              },
                      }).showToast();">
         </div>
</div>