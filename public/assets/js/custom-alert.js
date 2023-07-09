
const toast = swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 2000,
    padding: '2em'
});


const simpleMessage = function(status, message){
    toast({ type: status, title: message, padding: '2em' })
}

const successMessageDialog = function(status, message){
    swal({
        title: 'Good job!',
        text: message,
        type: status,
        padding: '2em'
      })
}