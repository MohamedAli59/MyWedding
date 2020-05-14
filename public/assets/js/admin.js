/* Slider pour les ajouter les commentaires  et les prestations */

$(document).ready(function () {
    $(".flip").click(function () {
        $(".panel").slideToggle("slow");
    });
    $(".flip1").click(function () {
        $(".panel1").slideToggle("slow");
    });
/*--------------------------------------------------------------------------------------------*/

     //  pour qu'au Click de la ligne on est accès au contenu.

    if (screen.width <= 760) {

        $(".mariage").click(function () {
            var id =$(this).children('td').html();

            document.location.href = "/admin/mariages/"+id;
        })

        $(".client").click(function () {
            var id =$(this).children('td').html();

            document.location.href = "/admin/clients/"+id;
        })

        $(".presta").click(function () {
            var id =$(this).children('td').html();

            document.location.href = "/admin/prestations/"+id;
        })
    }
    // Get the ul that holds the collection of tags
    $collectionHolder = $('ul.tags');

    // add the "add a tag" anchor and li to the tags ul
    $collectionHolder.append($newLinkLi);

    // count the current form inputs we have (e.g. 2), use that as the new
    // index when inserting a new item (e.g. 2)
    $collectionHolder.data('index', $collectionHolder.find('input').length);

    $addTagButton.on('click', function(e) {
        // add a new tag form (see next code block)
        addTagForm($collectionHolder, $newLinkLi);
    });

});

var $collectionHolder;

// setup an "add a tag" link
var $addTagButton = $('<button type="button" class="add_tag_link">Add a tag</button>');
var $newLinkLi = $('<li></li>').append($addTagButton);



function addTagForm($collectionHolder, $newLinkLi) {
    // Get the data-prototype explained earlier
    var prototype = $collectionHolder.data('prototype');

    // get the new index
    var index = $collectionHolder.data('index');

    var newForm = prototype;
    // You need this only if you didn't set 'label' => false in your tags field in TaskType
    // Replace '__name__label__' in the prototype's HTML to
    // instead be a number based on how many items we have
    // newForm = newForm.replace(/__name__label__/g, index);

    // Replace '__name__' in the prototype's HTML to
    // instead be a number based on how many items we have
    newForm = newForm.replace(/__name__/g, index);

    // increase the index with one for the next item
    $collectionHolder.data('index', index + 1);

    // Display the form in the page in an li, before the "Add a tag" link li
    var $newFormLi = $('<li></li>').append(newForm);
    $newLinkLi.before($newFormLi);
}

