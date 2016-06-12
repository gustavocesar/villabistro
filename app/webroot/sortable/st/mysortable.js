(function () {
    'use strict';

    var byId = function (id) {
        return document.getElementById(id);
    },
            loadScripts = function (desc, callback) {
                var deps = [], key, idx = 0;

                for (key in desc) {
                    deps.push(key);
                }

                (function _next() {
                    var pid,
                            name = deps[idx],
                            script = document.createElement('script');

                    script.type = 'text/javascript';
                    script.src = desc[deps[idx]];

                    pid = setInterval(function () {
                        if (window[name]) {
                            clearTimeout(pid);

                            deps[idx++] = window[name];

                            if (deps[idx]) {
                                _next();
                            } else {
                                callback.apply(null, deps);
                            }
                        }
                    }, 30);

                    document.getElementsByTagName('head')[0].appendChild(script);
                })()
            },
            console = window.console;


    if (!console.log) {
        console.log = function () {
            alert([].join.apply(arguments, ' '));
        };
    }

    [].forEach.call(byId('multi').getElementsByClassName('tile__list'), function (el) {
        Sortable.create(el, {
            group: 'photo',
            animation: 150,
            // Element is dropped into the list from another list
            onAdd: function (/**Event*/evt) {
//                updateSequence('onAdd');
//                return false;

//                $("body").addClass("loading");
//                $("body").removeClass("loading");

//                alert($(evt.to).html());
//                alert($(evt.item).html());
            },
            // Called by any change to the list (add / update / remove)
            onSort: function (/**Event*/evt) {

                //percorre cada lista de etapa
                $("#multi .tile__list").each(function () {
                    
                    //div recebe o html da lista de pedidos na etapa
                    var div = $(this);
                    
                    var stageId = div.find('.fistInputStage:first').val();

                    //percorre todos os inputs dentro da lista
                    div.find('.elementOrder input').each(function () {
                        
                        //atualiza o value de cada input, atualizando o ID da nova etapa
                        $(this).val(stageId);
                        
                        /**
                        orders[3][32]
                             =>
                        orders[4][32]
                        */
                        var name = $(this).attr('name');

                        var orderId = name.split('][');
                        orderId = orderId[1].replace(']', '');
                        
                        var newName = name.replace(name, 'orders['+stageId+']['+orderId+']');
                        
                        $(this).attr('name', newName);
                        
                    });

                });

                updateSequence('onSort');
                return false;

//                $("body").addClass("loading");
//                $("body").removeClass("loading");

//                var itemEl = evt.item;  // dragged HTMLElement
//                evt.oldIndex;  // element's old index within parent
//                evt.newIndex;  // element's new index within parent
//                alert('on sort: ' + evt.oldIndex + ' || ' + evt.newIndex);
            },
        });
    });


})();

function updateSequence(method) {
    $("#frmStageOrders").submit();
    return false;
}


// Background
document.addEventListener("DOMContentLoaded", function () {
    function setNoiseBackground(el, width, height, opacity) {
        var canvas = document.createElement("canvas");
        var context = canvas.getContext("2d");

        canvas.width = width;
        canvas.height = height;

        for (var i = 0; i < width; i++) {
            for (var j = 0; j < height; j++) {
                var val = Math.floor(Math.random() * 255);
                context.fillStyle = "rgba(" + val + "," + val + "," + val + "," + opacity + ")";
                context.fillRect(i, j, 1, 1);
            }
        }

        el.style.background = "url(" + canvas.toDataURL("image/png") + ")";
    }

    setNoiseBackground(document.getElementsByTagName('body')[0], 50, 50, 0.02);
}, false);
