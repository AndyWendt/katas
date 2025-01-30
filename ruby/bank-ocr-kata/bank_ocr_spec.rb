require 'rspec'
require_relative 'bank_ocr'

describe "user story 1" do
  it "parses numbers 0000000000" do
    first = Accounts.new(numbers_cases('user-story-1-000000000.txt'))[0]
    expect(first).to eq("000000000")
  end

  it "parses numbers 111111111" do
    first = Accounts.new(numbers_cases('user-story-1-111111111.txt'))[0]
    expect(first).to eq("111111111")
  end

  it "parses a number 0" do
    zero_array = [
      [' ', '|', '|'],
      ['_', ' ', '_'],
      [' ', '|', '|'],
    ]
    result = Number.new(zero_array).to_s
    expect(result).to eq("0")
  end

  it "parses a number 1" do
    zero_array = [
      [' ', ' ', ' '],
      [' ', ' ', '|'],
      [' ', ' ', '|'],
    ]
    result = Number.new(zero_array).to_s
    expect(result).to eq("1")
  end

  def numbers_cases(file)
    File.read(File.join(__dir__, file))
  end
end