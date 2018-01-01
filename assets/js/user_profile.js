require('../css/user_profile.scss');
require('../images/logo.png');
require('../images/user-thumb.jpg');

$(document).ready(function () {
    $('#myModal').on('show.bs.modal', function () {
        let btnCust = '<button type="button" class="btn btn-secondary" title="Add picture tags" ' +
            'onclick="alert(\'Call your custom code here.\')">' +
            '<i class="glyphicon glyphicon-tag"></i>' +
            '</button>';
        $("#avatar-2").fileinput({
            overwriteInitial: true,
            maxFileSize: 1500,
            showClose: false,
            showCaption: false,
            showBrowse: false,
            browseOnZoneClick: true,
            removeLabel: '',
            removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
            removeTitle: 'Cancel or reset changes',
            elErrorContainer: '#kv-avatar-errors-2',
            msgErrorClass: 'alert alert-block alert-danger',
            defaultPreviewContent: '<img src="https://www.google.pl/url?sa=i&rct=j&q=&esrc=s&source=images&cd=&cad=rja&uact=8&ved=0ahUKEwig1JiIjrfYAhUKJpoKHZSLCfQQjRwIBw&url=https%3A%2F%2Fsignalvnoise.com%2Fposts%2F3104-behind-the-scenes-reinventing-our-default-profile-pictures&psig=AOvVaw0IkGdLhdOYfjaQraMl2T8F&ust=1514907959618334" alt="Your Avatar"><h6 class="text-muted">Click to select</h6>',
            layoutTemplates: {main2: '{preview} ' +  btnCust + ' {remove} {browse}'},
            allowedFileExtensions: ["jpg", "png", "gif"]
        });
    });
});
