require 'rspec'
require_relative 'bank_ocr'

def accounts_file_reader(file_name)
  file_path = File.join(__dir__, file_name)
  File.read(file_path)
end

describe 'user story 1' do
  describe Accounts do
    it 'parses an account number' do
      {
        :'user-story-1-000000000.txt' => '000000000',
        :'user-story-1-111111111.txt' => '111111111',
        :'user-story-1-222222222.txt' => '222222222',
      }.each do |file_name_symbol, expected|
        account_numbers_string = accounts_file_reader(file_name_symbol.to_s).to_s
        result = Accounts.from_string(account_numbers_string).to_a

        expect(result).to eq([expected])
      end
    end
  end

  describe Account do
    it 'converts a pipe/underscore array representation of numbers to a array of string numbers' do
      input = [
        [' ', '_', ' ', ' ', '_', ' ', ' ', '_', ' ', ' ', '_', ' ', ' ', '_', ' ', ' ', '_', ' ', ' ', '_', ' ', ' ', '_', ' ', ' ', '_', ' ',],
        ['|', ' ', '|', '|', ' ', '|', '|', ' ', '|', '|', ' ', '|', '|', ' ', '|', '|', ' ', '|', '|', ' ', '|', '|', ' ', '|', '|', ' ', '|'],
        ['|', '_', '|', '|', '_', '|', '|', '_', '|', '|', '_', '|', '|', '_', '|', '|', '_', '|', '|', '_', '|', '|', '_', '|', '|', '_', '|'],
        [' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ',]
      ]

      expected = '000000000'

      result = Account.new(input).to_s

      expect(result).to eq(expected)
    end
  end

  describe Number do
    it 'converts a pipe/underscore array representation of a number to a string number' do
      {
        '0' => [
          [' ', '_', ' '],
          ['|', ' ', '|'],
          ['|', '_', '|'],
        ],
        '1' => [
          [' ', ' ', ' '],
          [' ', ' ', '|'],
          [' ', ' ', '|'],
        ],
        '2' => [
          [' ', '_', ' '],
          [' ', '_', '|'],
          ['|', '_', ' '],
        ],
      }.each do |expected, pipe_underscore_number_array|
        result = Number.new(pipe_underscore_number_array).to_s
        expect(result).to eq(expected)
      end
    end
  end
end