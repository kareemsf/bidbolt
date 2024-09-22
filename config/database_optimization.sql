-- Database Optimization SQL Script
-- Adding indexes to frequently queried fields to speed up query performance

CREATE INDEX idx_user_email ON users (email);
CREATE INDEX idx_vendor_name ON vendors (name);
CREATE INDEX idx_transaction_date ON transactions (date);
