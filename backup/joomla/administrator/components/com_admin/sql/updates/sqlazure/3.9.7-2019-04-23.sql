CREATE NONCLUSTERED INDEX [idx_client_id_guest] ON [#__session]
(
	[client_id] ASC,
	[guest] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, DROP_EXISTING = OFF, ONLINE = OFF);
