require 'rspec'
require_relative 'bank_ocr'

describe "user story 1" do
  it "parses numbers" do
    first = Accounts.new(numbers_cases)[0]
    expect(first).to eq("000000000")
  end

  it "parses a number" do
    zero_array = [
      [' ', '|', '|'],
      ['_', ' ', '_'],
      [' ', '|', '|'],
    ]
    result = Number.new(zero_array).to_s
    expect(result).to eq("0")
  end

  def numbers_cases
    File.read(File.join(__dir__, 'user-story-1-000000000.txt'))
  end
end