delete from bills;
delete from orders;
delete from payments;
delete from entry_notes;
delete from entry_note_items;
delete from internal_transfers;
delete from internal_transfer_items;
delete from manual_adjustments;
delete from stocks where (
    entry_note_item_id is not null
    or
    internal_transfer_item_id is not null
    or
    order_id is not null
    or
    manual_adjustment_id is not null
)
;
