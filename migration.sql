create table messages
(
    id      varchar                               not null
        constraint messages_pk
            primary key,
    user_id varchar                               not null,
    text    varchar default ''::character varying not null,
    date    timestamp                             not null
);

alter table messages
    owner to "MTS";

create unique index messages_id_uindex
    on messages (id);

