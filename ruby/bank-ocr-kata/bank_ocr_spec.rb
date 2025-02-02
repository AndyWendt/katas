require 'rspec'
require_relative 'bank_ocr'

def accounts_file_reader(file_name)
  file_path = File.join(__dir__, file_name)
  File.open(file_path)
end

describe "user story 1" do
  describe Accounts do
    it "parses an account number" do

      {
        :'user-story-1-000000000.txt' => '000000000',
      }.each do |file_name_symbol, expected|
        account_numbers_string = accounts_file_reader(file_name_symbol.to_s)
        result = Accounts.from_string(account_numbers_string).to_a

        expect(result).to eq([expected])
      end
    end
  end
end