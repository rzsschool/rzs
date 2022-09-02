window.onload=function(e){
    let content = document.getElementById('content');

    for (let i = 1; i < 3; i++) {
        let elemImg = document.createElement('img');
        elemImg.src = `/static/img/admin/favico${i}.jpg`;
        elemImg.alt = 'img';

        let elemDiv = document.createElement('div');

        elemDiv.appendChild(elemImg)
        content.appendChild(elemDiv)
    };
};
window.onload=function(e){
    let content = document.getElementById('content');
    let arrClassName = [
      'primary',
      'secondary',
      'success',
      'danger',
      'warning',
      'info',
      'light',
      'dark',
    ]

    let elemWrapper = document.createElement('div');
    elemWrapper.setAttribute('style', "padding: 20px;");

    let elemLink = document.createElement('a');
    elemLink.href = 'https://getbootstrap.com/docs/4.0/components/alerts/#additional-content';
    elemLink.textContent = 'https://getbootstrap.com/docs/4.0/components/alerts/#additional-content';
    elemLink.setAttribute('target', "_blank");
    elemWrapper.appendChild(elemLink)

    content.appendChild(elemWrapper);

    for (let i = 0; i < arrClassName.length; i++) {
        let ClassName = arrClassName[i];

        let elemDiv = document.createElement('div');
        elemDiv.classList.add('alert')
        elemDiv.classList.add(`alert-${ClassName}`)
        elemDiv.textContent = `Стиль: ${ClassName}`;
        
        content.appendChild(elemDiv)
       
   };
};

{/* <li class="page-item {{ class_first_page }}">
    <a class="page-link" href="{% url 'blog' %}?page={{ previous_link }}&cat={{ active_category }}" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
    </a>
</li>
<li class="page-item active"><a class="page-link" href="{% url 'blog' %}?page={{ n }}&cat={{ active_category }}">{{ n }}</a></li>
<!-- {% for n in list_of_pages %}
{% if n == page_number%}
<li class="page-item active"><a class="page-link" href="{% url 'blog' %}?page={{ n }}&cat={{ active_category }}">{{ n }}</a></li>
{% elif n == 0 %}
<li class="page-item page-link">...</li>
{% else %}
<li class="page-item"><a class="page-link" href="{% url 'blog' %}?page={{ n }}&cat={{ active_category }}">{{ n }}</a></li>
{% endif %}

{% endfor %} -->
<li class="page-item {{ class_last_page }}">
    <a class="page-link" href="{% url 'blog' %}?page={{ next_link }}&cat={{ active_category }}" aria-label="Next">
    <span aria-hidden="true">&raquo;</span>
    <span class="sr-only">Next</span>
    </a>
</li> */}
