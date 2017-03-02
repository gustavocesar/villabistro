delete from orders;
delete from stocks where order_id is not null;

delete from payments;
delete from bills;

delete from entry_notes;
delete from entry_note_items;
delete from stocks where entry_note_item_id is not null;

delete from internal_transfers;
delete from internal_transfer_items;
delete from stocks where internal_transfer_item_id is not null;

delete from manual_adjustments;
delete from stocks where manual_adjustment_id is not null;


ALTER TABLE bills auto_increment = 1;
ALTER TABLE orders auto_increment = 1;
ALTER TABLE stocks auto_increment = 1;
ALTER TABLE payments auto_increment = 1;
ALTER TABLE entry_notes auto_increment = 1;
ALTER TABLE entry_note_items auto_increment = 1;
ALTER TABLE internal_transfers auto_increment = 1;
ALTER TABLE manual_adjustments auto_increment = 1;
