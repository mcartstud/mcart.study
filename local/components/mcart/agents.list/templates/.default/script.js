BX.ready(function() {
    /*
    1. Спомощью document.querySelectorAll получить все DOM-элементы с классом star
    2. Повесить обработчик события на click
    Пример: BX.bind(element, "click", clickStar);
     */

    let stars = document.querySelectorAll(".star");
    stars.forEach(star => {        
        BX.bind(star, "click", clickStar);
    })
});
function clickStar(event) {
    event.preventDefault();
    let agentID = event.target.closest("a").dataset.agentid;
    /*
    Получить agentID, в template.php добавьте тегу в классов star атрибут dataset
    cо значением ID элемента Агента
    (https://developer.mozilla.org/en-US/docs/Web/API/HTMLElement/dataset)
     */

    if (agentID) { // если ID есть, то делаем ajax-запрос
        BX.ajax // https://dev.1c-bitrix.ru/api_help/js_lib/ajax/bx_ajax_runcomponentaction.php
            .runComponentAction(
                "mcart:agents.list", // название компонента
                "clickStar", // название метода, который будет вызван из class.php
                {
                    mode: "class", //это означает, что мы хотим вызывать действие из class.php
                    data: {
                        agentID: agentID // параметры, которые передаются на бэк
                    },
                }
            )
            .then( // если на бэке нет ошибок выполниться
                BX.proxy((response) => {
                    let data = response.data;
                    if (data['action'] == 'success') {
                        // Отобразить пользоватиелю, что агент добавлен в избраное (желтая звездочка, есть в верстке)
                        
                        if (document.querySelector('[data-agentid="'+data['ID']+'"]').classList.contains("active")) {
                            document.querySelector('[data-agentid="'+data['ID']+'"]').classList.remove("active");
                        }
                        else {
                            document.querySelector('[data-agentid="'+data['ID']+'"]').classList.add("active");
                        }
                    }

                }, this)
            )
            .catch( // если на бэке есть ошибки выполниться
                BX.proxy((response) => {
                    console.log(response.errors);
                }, this)
            );
    }

}
