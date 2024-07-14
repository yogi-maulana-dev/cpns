<div>
    <x-button @click="$dispatch('notifity',{title:'success' message:'Selamat anda berhasil'})">Klik Saya</x-button>
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
              background: ($event.detail.title === 'success') ? 'linear-grandient(to right, #80AF81, #96C9F4)' : 'linear-gradient(to right, #96C9F4, #E90074)',
              },
                      }).showToast();">
         </div>
</div>