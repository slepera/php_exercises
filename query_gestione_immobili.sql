select locatario.nome, contratto.id_contratto, count(spesa.id_spesa)-count(pagamento.id_pagamento) as non_pagate
from locatario join contratto on locatario.id_locatario = contratto.id_locatario
join spesa on contratto.id_contratto = spesa.id_contratto
left join pagamento on pagamento.id_spesa = spesa.id_spesa
group by contratto.id_contratto




select luogo, sum(importo) as importo_totale from spesa join contratto on spesa.id_contratto = contratto.id_contratto
join immobile on contratto.id_immobile = immobile.id_immobile
group by luogo