FROM php

ADD entrypoint.php /code/entrypoint.php

ENTRYPOINT /code/entrypoint.php